<?php

namespace App\Livewire;

use App\Livewire\Forms\SearchModelForm;
use App\Services\SearchService;
use Livewire\Component;

class SearchModal extends Component
{
    public SearchModelForm $form;

    public function render(SearchService $searchService)
    {
        if ($this->form->filterType === 1) {
            $films = $searchService->searchFilms($this->form->toArray());
        } elseif ($this->form->filterType === 2) {
            $films = $searchService->searchFiles($this->form->toArray());
        } else {
            $data = $searchService->search($this->form->toArray());
            $films = $data['films'];
            $files = $data['files'];
        }
        return view('livewire.search-modal', [
            'films' => $films ?? collect([]),
            'files' => $files ?? collect([]),
        ]);
    }
}
