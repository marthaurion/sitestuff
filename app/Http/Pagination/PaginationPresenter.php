<?php
namespace App\Http\Pagination;

use Illuminate\Pagination\SimpleBootstrapThreePresenter;

class PaginationPresenter extends SimpleBootstrapThreePresenter
{
    public function render()
    {
        if ($this->hasPages())
        {
            return sprintf(
                '<ul class="pager">%s %s</ul>',
                $this->getPreviousButton("< Previous"),
                $this->getNextButton("Next >")
            );
        }

        return '';
    }
}
