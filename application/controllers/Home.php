<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('facebook');
        $this->load->model('user');
    }

    function index()
    {
        $this->load->view('layout/header');
        $this->load->view('home/index_view');
        $this->load->view('layout/footer');
    }

    function register()
    {
        $this->load->model('Users_model');
        $this->load->library('form_validation');

        if (isset($_POST['submit_reg'])) {
            $this->load->model('Rules_model');
            $this->form_validation->set_rules($this->Rules_model->add_rules);
            $check = $this->form_validation->run();

            if ($check == TRUE) {

                $add['username'] = $this->input->post('username');
                $add['email'] = $this->input->post('email');
                $this->load->library('encryption');
                $key = bin2hex($this->encryption->create_key(16));
                $options = [
                    'cost' => 12,
                    'salt' => $key,
                ];
                $secure_code = @password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

                $add['password'] = $secure_code;
                $this->Users_model->add_user($add);
                $this->load->view('layout/header');
                $this->load->view('home/success_view');
                $this->load->view('layout/footer');
                
            } else {
                $this->load->view('layout/header');
                $this->load->view('home/register_view');
                $this->load->view('layout/footer');
            }
        } else {
            $this->load->view('layout/header');
            $this->load->view('home/register_view');
            $this->load->view('layout/footer');
        }
    }

    function login()
    {
        if ($this->session->has_userdata('is_logged') == false) {

            $this->load->model('Users_model');
            $this->load->library('form_validation');

            if (isset($_POST['submit_login'])) {
                $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]alpha|max_length[30]|trim');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[30]|trim');
                $check = $this->form_validation->run();

                if ($check == TRUE) {

                    $username = $this->input->post('username');
                    $password = $this->input->post('password');

                    $get_pass = $this->Users_model->can_login($username);
                    $log = $this->Users_model->validate_password($password, $get_pass);

                    if ($log == true) {
                        $session_data = [
                            'username' => $username,
                            'is_logged' => TRUE,
                        ];
                        $this->session->set_userdata($session_data);
                        redirect(base_url() . 'home/enter');
                    } else {
                        $this->session->set_flashdata('error', 'Invalid Username or Password');
                        $this->load->view('layout/header');
                        $this->load->view('home/login_view');
                        $this->load->view('layout/footer');
                    }

                } else {
                    $this->load->view('layout/header');
                    $this->load->view('home/login_view');
                    $this->load->view('layout/footer');
                }
            } else {
                $data['authUrl'] = $this->facebook->login_url();
                $this->load->view('layout/header');
                $this->load->view('home/login_view', $data);
                $this->load->view('layout/footer');
            }

        } else {
            redirect(base_url() . 'home');
        }

    }

    function enter()
    {
        if ($this->session->has_userdata('is_logged') == true) {
            if ($this->session->userdata('username') != ' ') {

                $this->load->view('layout/header');
                $this->load->view('home/enter_view');
                $this->load->view('layout/footer');
            } else {
                redirect(base_url() . 'home/login');
            }
        } else {
            redirect(base_url() . 'home/login');
        }
    }

    function fb_login()
    {
        $userData = array();
        if ($this->facebook->is_authenticated()) {
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/' . $userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];

            $userID = $this->user->checkUser($userData);

            if (!empty($userID)) {
                $data['userData'] = $userData;

                $newdata = array(
                    'is_logged' => TRUE,
                    
                );

                $this->session->set_userdata($newdata);
                $this->session->set_userdata('userData', $userData);
            } else {
                $data['userData'] = array();
            }
            $data['logoutUrl'] = $this->facebook->logout_url();
        } else {
            $fbuser = '';
            $data['authUrl'] = $this->facebook->login_url();
        }
        $this->load->view('layout/header');
        $this->load->view('home/fb_login_view', $data);
        $this->load->view('layout/footer');

    }

    function logout()
    {
        $this->facebook->destroy_session();
        $this->session->unset_userdata('userData');
        $this->session->unset_userdata(['username', 'is_logged']);
        redirect(base_url() . 'home/login');

    }

}



//                $this->load->library('googlemaps');
////                $config['center'] = 'auto';
//                $config['zoom'] = 'auto';
//                $config['places'] = TRUE;
//                $config['placesAutocompleteInputID'] = 'event_location';
//                $config['onclick'] = "alert(event.latLng.lat() + ',' + event.latLng.lng())";
//                $this->googlemaps->initialize($config);
//
//                $marker = array();
//                $marker['position'] = '40.19658829999999,  44.48001620000002';
//                $marker['infowindow_content'] = 'Hi';
//                $marker['animation'] = 'DROP';
//                $this->googlemaps->add_marker($marker);
//
//                $data['map'] = $this->googlemaps->create_map();
