<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Controller usado para controlar eventos e fotos associadas a eles.
 */
class Events extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(['url', 'form']);
        $this->load->helper('authorization');
        $this->load->library('session');
        $this->load->model('Event_model');
    }
    /**
     * Lista todos os eventos do arena
     */
    public function index()
    {
        ensureIsLogged();
        $events = $this->Event_model->getAll();
        $this->load->view('event/event', [
            'events' => $events
        ]);
    }
    /**
     * Lista as fotos de um evento
     */
    public function photos()
    {
        ensureIsLogged();
        $eventId = $this->uri->segment(3);
        $photos = $this->Event_model->getPhotos($eventId);
        $this->load->view('event/photos', [
            'photos' => $photos
        ]);
    }
    /**
     * Faz upload e adiciona uma foto a um evento
     */
    public function addphoto()
    {
        ensureIsLogged();
        $eventId = $this->uri->segment(3);
        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'max_size' => "4096000",
            'max_height' => "2000",
            'max_width' => "2000"
        );
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('photos')) {
            $file_name = $this->upload->data()['file_name'];
            $userId = $this->session->userdata('userId');
            $this->Event_model->addphoto('/uploads/' . $file_name, $userId, $eventId);
            $this->load->view('message', [
                'message' => 'Foto adicionada com sucesso',
                'type' => 'info',
                'url' => '/events/photos/' . $eventId
            ]);
        } else {
            $this->load->view('message', [
                'message' => $this->upload->display_errors(),
                'type' => 'danger',
                'url' => '/events/photos/' . $eventId
            ]);
        }
    }
}
