<?php

class Paginator
{
    public $limit;
    public $offset;
    public $previous;
    public $next;
    public $totalPages;

    public function __construct($page, $recordsPerPage, $totalRecords)
    {
        $this->limit = $recordsPerPage;

        $page = filter_var($page, FILTER_VALIDATE_INT, [
            'options' => [
                'default' => 1,
                'min_range' => 1,
            ]
        ]);

        if ($page > 1) {

            $this->previous = $page - 1;
        }

        $this->totalPages = ceil($totalRecords / $recordsPerPage);

        if ($page < $this->totalPages) {

            $this->next = $page + 1;
        }

        $this->offset = $recordsPerPage * ($page - 1);
    }
}

?>