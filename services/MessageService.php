<?php
require_once "../repositories/MessageRepository.php";


class MessageService {

    private MessageRepository $messageRepository;

    public function __construct(){
        $this->messageRepository = new MessageRepository();
    }

    public function createMessage(string $message, int $idUtilisateur, int $idSujet): void{
        $this->messageRepository->createMessage($message, $idUtilisateur, $idSujet);
    }

    public function getMessages(int $id) : array | null{
        return $this->messageRepository->getMessages($id);
    }

    public function deleteMessage(int $id): void{
        $this->messageRepository->deleteMessage($id);
    }  
}

?>