<?php

namespace App\View\Components\Shop;

use App\Models\Slider;
use Illuminate\View\Component;

class Banner extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
//        $articles = \App\Models\Article::query()->latest()->paginate(3);
        $sliders = Slider::query()->get();

        return view('shop.components.banner', compact('sliders'));
    }
}
