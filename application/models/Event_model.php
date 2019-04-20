<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Modelo com operações relacionadas a eventos.
 */
class Event_model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }
    /**
     * Retorna todos os eventos
     */
    function getAll()
    {
        return $this->db
            ->get('event')
            ->result();
    }

    /**
     * Adiciona uma foto a um evento
     * @param urlPhoto Url da foto que foi dado upload
     * @param userId Id do usuário que está adicionando a foto
     * @param eventId Id do evento que está sendo adicionado a foto.
     * @return boolean Indica se foi bem sucedido.
     */
    function addPhoto($urlPhoto, $userId, $eventId)
    {
        return $this->db->insert('photo', [
            'eventId' => $eventId,
            'userId' => $userId,
            'url' => $urlPhoto
        ]);
    }

    /**
     * Retorna as fotos de um evento
     * @param eventId Id do evento
     */
    function getPhotos($eventId)
    {
        return $this->db
            ->where('eventId', $eventId)
            ->select('photo.*, event.name as eventName, event.id as eventId')
            ->join('event', 'event.id = photo.eventId')
            ->get('photo')
            ->result();
    }
}
