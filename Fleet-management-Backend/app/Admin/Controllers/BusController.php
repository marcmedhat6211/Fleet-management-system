<?php

namespace App\Admin\Controllers;

use App\Models\Bus;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Station;

class BusController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Bus';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Bus());

        $grid->column('id', __('Bus Number'));
        $grid->column('src_name', __('Pick-up point'));
        $grid->column('dest_name', __('Destination'));
        $grid->column('seat_1', __('Seat 1'));
        $grid->column('seat_2', __('Seat 2'));
        $grid->column('seat_3', __('Seat 3'));
        $grid->column('seat_4', __('Seat 4'));
        $grid->column('seat_5', __('Seat 5'));
        $grid->column('seat_6', __('Seat 6'));
        $grid->column('seat_7', __('Seat 7'));
        $grid->column('seat_8', __('Seat 8'));
        $grid->column('seat_9', __('Seat 9'));
        $grid->column('seat_10', __('Seat 10'));
        $grid->column('seat_11', __('Seat 11'));
        $grid->column('seat_12', __('Seat 12'));
        $grid->column('seats_number', __('Seats number'));
        $grid->column('availability', __('Availability'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Bus::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('src_name', __('Src name'));
        $show->field('dest_name', __('Dest name'));
        $show->field('seat_1', __('Seat 1'));
        $show->field('seat_2', __('Seat 2'));
        $show->field('seat_3', __('Seat 3'));
        $show->field('seat_4', __('Seat 4'));
        $show->field('seat_5', __('Seat 5'));
        $show->field('seat_6', __('Seat 6'));
        $show->field('seat_7', __('Seat 7'));
        $show->field('seat_8', __('Seat 8'));
        $show->field('seat_9', __('Seat 9'));
        $show->field('seat_10', __('Seat 10'));
        $show->field('seat_11', __('Seat 11'));
        $show->field('seat_12', __('Seat 12'));
        $show->field('seats_number', __('Seats number'));
        $show->field('availability', __('Availability'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Bus());
        
        $sources = Station::get('name')->pluck('name')->toArray();
        $mapped = [];
        foreach($sources as $source) {
            $mapped["$source"] = $source;
        }

        $form->select('src_name', __('Pick-up point'))->options($mapped)->rules('required');
        $form->select('dest_name', __('Destination'))->options($mapped)->rules('required');
        $form->switch('seat_1', __('Seat 1'))->default(1);
        $form->switch('seat_2', __('Seat 2'))->default(1);
        $form->switch('seat_3', __('Seat 3'))->default(1);
        $form->switch('seat_4', __('Seat 4'))->default(1);
        $form->switch('seat_5', __('Seat 5'))->default(1);
        $form->switch('seat_6', __('Seat 6'))->default(1);
        $form->switch('seat_7', __('Seat 7'))->default(1);
        $form->switch('seat_8', __('Seat 8'))->default(1);
        $form->switch('seat_9', __('Seat 9'))->default(1);
        $form->switch('seat_10', __('Seat 10'))->default(1);
        $form->switch('seat_11', __('Seat 11'))->default(1);
        $form->switch('seat_12', __('Seat 12'))->default(1);
        $form->switch('availability', __('Availability'))->default(1);

        return $form;
    }
}
