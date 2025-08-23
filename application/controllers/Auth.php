<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
    }

    // Halaman login
    public function index() {
        if ($this->session->userdata('user_id')) {
            redirect('dashboard'); // Jika sudah login, arahkan ke dashboard
        }
        $this->load->view('login'); // View login
    }

    // Proses login
    public function login() {
        $username = $this->input->post('email-username', true);
        $password = $this->input->post('password', true);

        $user = $this->User_model->getByUsernameOrEmail($username);

        if ($user && password_verify($password, $user->password)) {
            // Set session
            $this->session->set_userdata([
                'user_id' => $user->id_user,
                'username' => $user->username,
                'nama' => $user->nama,
                'role' => $user->role
            ]);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Username/email atau password salah!');
            redirect('auth');
        }
    }

    // Logout
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
