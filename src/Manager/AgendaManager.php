<?php
namespace App\Manager;

use Plugo\Manager\AbstractManager;
use App\Entity\Agenda;

class AgendaManager extends AbstractManager{


  public function findAll($criteria) {
    return $this->readMany(Agenda::class, $criteria);
  }
 
  public function add(Agenda $agenda) {
    return $this->create(Agenda::class, [
      'title' => $agenda->getTitle(),
      'details' => $agenda->getDetails(),
      'date' => $agenda->getDatetime(),
      'important' => $agenda->getImportant(),
    ]);
  }

  public function destroy(int $id) {
    return $this->delete(Agenda::class, $id);
  }
  
  public function edit(Agenda $agenda) {
    return $this->update(Agenda::class, [
      'title' => $agenda->getTitle(),
      'details' => $agenda->getDetails(),
      'date' => $agenda->getDatetime(),
      'important' => $agenda->getImportant(),
      ],
      $agenda->getId()
    );
  }

  public function find(array $criteria) {
    return $this->readOne(Agenda::class, $criteria);
  }

  public function findOneBy(array $criteria) {
    return $this->readOne(Agenda::class, $criteria);
  }

  public function findBy(array $criteria) {
    return $this->readMany(Agenda::class, $criteria);
  }



}