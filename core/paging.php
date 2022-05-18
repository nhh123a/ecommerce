<?php
class paging{
    public $limit;
    public $offset;
    public $basepath;
    public $totalrecords;
    public $totalpage;
    public $currentpage;

    function __construct($basepath,$totalrecords,$limit,$offset,$currentpage){
        $this->basepath = $basepath;
        $this->offset = $offset;
        $this->limit = $limit;
        $this->totalrecords = $totalrecords;
        $this->totalpage = ceil($this->totalrecords / $this->limit);
        $this->currentpage = $currentpage;
        if ($this->currentpage > $this->totalpage){
            $currentpage = $this->totalpage;
        }
        else if ($this->currentpage < 1){
            $this->currentpage = 1;
        }
    }

    function createlink(){
        $html = '<nav aria-label="Page navigation example">';
        $html .= '<ul class="pagination">';
        if ($this->currentpage > 1 && $this->totalpage > 1){
            $html .= '<li class="page-item"><a class="page-link" href="'.$this->basepath.'&page='.($this->currentpage-1).'">Prev</a></li>';
        }
        for ($i=1; $i <= $this->totalpage ; $i++) { 
            $html .= '<li class="page-item"><a class="page-link" href="'.$this->basepath.'&page='.$i.'">'.$i .'</a></li>';
        }
        if ($this->currentpage < $this->totalpage && $this->totalpage > 1){
            $html .= '<li class="page-item"><a class="page-link" href="'.$this->basepath.'&page='.($this->currentpage+1).'">Next</a></li>';
        }
        $html .='</ul>
        </nav>';
        return $html;
    }
}
?>