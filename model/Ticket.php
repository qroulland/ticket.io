<?php 

class Ticket {

    public $id;
    public $titre;
    public $description;
    public $date_creation;
    public $date_debut;
    public $date_fin;
    public $urgence;
    public $status;
    public $id_demandeur;
    public $id_intervenant;

    function new_ticket(){

    }

    function delete_ticket(){

    }

    function set_status_ticket($next_status){
        $this->status = $next_status;
    }
}