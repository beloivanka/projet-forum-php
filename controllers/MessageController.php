<?php
require_once "../services/MessageService.php";
class MessageController {

    private MessageService $messageService;
    public function __construct() {
        $this->messageService = new MessageService();
    }

    public function createMessage(string $message, int $idUtilisateur, int $idSujet): void{
        $this->messageService->createMessage($message, $idUtilisateur, $idSujet);
    }

    public function getMessages(): array | null{
        return $this->messageService->getMessages();
    }

    public function deleteMessage(int $id): void{
        $this->messageService->deleteMessage($id);
    }
}
?>