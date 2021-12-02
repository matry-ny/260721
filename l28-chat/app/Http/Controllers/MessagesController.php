<?php

namespace App\Http\Controllers;

use App\Models\Message;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MessagesController extends Controller
{
    public function getMessages(int $roomId): array
    {
        return Message::query()->where('room_id', $roomId)->get()->all();
    }

    public function export(int $roomId): StreamedResponse
    {
        $messages = Message::query()->where('room_id', $roomId)->get()->all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $columns = array_keys(current($messages)->toArray());
        foreach ($columns as $index => $column) {
            $sheet->setCellValueByColumnAndRow($index + 1, 1, $column);
        }

        foreach ($messages as $row => $message) {
            foreach (array_values($message->toArray()) as $column => $value) {
                $sheet->setCellValueByColumnAndRow($column + 1, $row + 2, $value);
            }
        }

        $writer = new Xlsx($spreadsheet);

        $response = new StreamedResponse(static function () use ($writer) {
            $writer->save('php://output');
        });
        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', "attachment;filename=messages_from_room_{$roomId}.xlsx");
        $response->headers->set('Cache-Control','max-age=0');

        return $response;
    }
}
