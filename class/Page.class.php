<?php

class Page
{
    public $total;
    public $length;
    public $pagenum;
    public $page;
    public $offset;
    public $limit;
    public $prevpage;
    public $nextpage;
    public $type;
    public $url;
    private $bothnum;      //两边保持数字分页的量
    private $show;
    private $pagebar;


    function __construct($url, $total, $length, $type, $show)
    {
        $this->total = $total;
        $this->length = $length;
        $this->page = $_REQUEST['page'] ? $_REQUEST['page'] : 1;
        $this->pagenum = ceil($this->total / $this->length);
        $this->offset = ($this->page - 1) * $this->length;
        $this->limit = "limit {$this->offset},{$this->length}";
        $this->prevpage = $this->page - 1;
        $this->type = $type;
        $this->url = $url;
        $this->bothnum = 2;
        $this->show = $show;
        $this->nextpage();
    }

    function nextpage()
    {
        if ($this->page >= $this->pagenum) {
            $this->nextpage = $this->pagenum;
        } else {
            $this->nextpage = $this->page + 1;
        }
    }

     function pageList()
    {

        for ($i = $this->bothnum; $i >= 1; $i--) {
            $_page = $this->page - $i;
            if ($_page < 1) continue;
            $_pagelist .= " <a class='topagesend' id='topage_'{$_page} page = {$_page} show = {$this->show}  type={$this->type} >" . $_page . '</a> ';
        }
        $_pagelist .= ' <span class="active">' . $this->page . '</span> ';
        for ($i = 1; $i <= $this->bothnum; $i++) {
            $_page = $this->page + $i;
            if ($_page > $this->pagenum) break;
            $_pagelist .= " <a class='topagesend' id='topage_'{$_page} page = {$_page} show = {$this->show}  type={$this->type} >" . $_page . '</a> ';
        }
        return $_pagelist;
    }

    function page()
    {

        return $this->page;

    }

    function show()
    {

        if ($this->page == 1) {
            if ($this->nextpage == 1) { //只有一页 不显示前一页与后一页

                $this->pagebar = "<div style=\"margin-left:500px\"><p><b>
                总计{$this->total}条记录 <a page = 1 show = {$this->show}  type={$this->type} id = 'firstpage' onclick='firstpagesend()'>首页</a>
                |" . $this->pageList() . "
                |<a page = {$this->pagenum} show = {$this->show}  type={$this->type}   id = 'lastpage'   onclick='lastpagesend()'>末页</a>
                |跳到<select name='topage' id = 'jumptopage' size='1' onchange='jumptopagesend()'  show = $this->show >
                </b></p></div>";

                for ($i = 1; $i <= $this->pagenum; $i++) {
                    if ($i == $this->page) $this->pagebar .= "<option value='$i' selected>$i</option>\n";
                    else
                        $this->pagebar .= "<option value='$i'>$i</option>\n";
                }

                echo $this->pagebar;

            } else {//不显示前一页

                $this->pagebar = "<div style=\"margin-left:500px\"><p><b>
                总计{$this->total}条记录 <a page = 1 show = {$this->show}  type={$this->type} id = 'firstpage' onclick='firstpagesend()'>首页</a>
                |" . $this->pageList() . "
                |<a page = {$this->nextpage} show = {$this->show}  type={$this->type} id = 'nextpage' onclick='nextpagesend()'>下一页</a>
                |<a page = {$this->pagenum} show = {$this->show}  type={$this->type}   id = 'lastpage'   onclick='lastpagesend()'>末页</a>
                |跳到<select name='topage' id = 'jumptopage' size='1' onchange='jumptopagesend()'  show = $this->show >
                </b></p></div>";


                for ($i = 1; $i <= $this->pagenum; $i++) {
                    if ($i == $this->page) $this->pagebar .= "<option value='$i' selected>$i</option>\n";
                    else
                        $this->pagebar .= "<option value='$i'>$i</option>\n";
                }

                echo $this->pagebar;

            }

        } else if ($this->page * $this->length >= $this->total) { //不显示下一页

            $this->pagebar = "<div style=\"margin-left:500px\"><p><b>
            总计{$this->total}条记录 <a page = 1 show = {$this->show}  type={$this->type} id = 'firstpage' onclick='firstpagesend()'>首页</a>
            |<a page = {$this->prevpage} show = {$this->show}  type={$this->type}  id = 'prepage' onclick='prepagesend()'>上一页</a>
            |" . $this->pageList() . "
            |<a page = {$this->pagenum} show = {$this->show}  type={$this->type}   id = 'lastpage'   onclick='lastpagesend()'>末页</a>
            |跳到<select name='topage' id = 'jumptopage' size='1' onchange='jumptopagesend()'  show = $this->show >
            </b></p></div>";

            for ($i = 1; $i <= $this->pagenum; $i++) {
                if ($i == $this->page) $this->pagebar .= "<option value='$i' selected>$i</option>\n";
                else
                    $this->pagebar .= "<option value='$i'>$i</option>\n";
            }

            echo $this->pagebar;

        } else {//显示所有

            $this->pagebar = "<div style=\"margin-left:500px\"><p><b>
            总计{$this->total}条记录 <a page = 1 show = {$this->show}  type={$this->type} id = 'firstpage' onclick='firstpagesend()'>首页</a>
            |<a page = {$this->prevpage} show = {$this->show}  type={$this->type}  id = 'prepage' onclick='prepagesend()'>上一页</a>
            |" . $this->pageList() . "
            |<a page = {$this->nextpage} show = {$this->show}  type={$this->type} id = 'nextpage' onclick='nextpagesend()'>下一页</a>
            |<a page = {$this->pagenum} show = {$this->show}  type={$this->type}   id = 'lastpage'   onclick='lastpagesend()'>末页</a>
            |跳到<select name='topage' id = 'jumptopage' size='1' onchange='jumptopagesend()'  show = $this->show >
            </b></p></div>";

            for ($i = 1; $i <= $this->pagenum; $i++) {
                if ($i == $this->page) $this->pagebar .= "<option value='$i' selected>$i</option>\n";
                else
                    $this->pagebar .= "<option value='$i'>$i</option>\n";
            }

            echo $this->pagebar;

        }
    }
}

?>