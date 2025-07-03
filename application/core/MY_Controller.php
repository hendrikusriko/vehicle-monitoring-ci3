<?php
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in')) {
            $this->load->model('Log_model');

            $controller = $this->router->fetch_class();
            $method = $this->router->fetch_method();
            $user_id = $this->session->userdata('user_id');
            $user_name = $this->session->userdata('name'); // Ambil nama user

            // Mapping method ke label aksi
            $log_methods = [
                'store'  => 'create',
                'update' => 'update',
                'delete' => 'delete',
                'approve' => 'approval',
                'reject' => 'reject'
            ];

            // Kecualikan controller tertentu jika perlu
            $excluded_controllers = ['Auth', 'Logs'];

            if (isset($log_methods[$method]) && !in_array($controller, $excluded_controllers)) {
                $action_label = $log_methods[$method];
                $activity = "User {$user_name} melakukan aksi {$action_label} pada {$controller}";
                $this->Log_model->insert_log($user_id, $activity);
            }
        }
    }
}
