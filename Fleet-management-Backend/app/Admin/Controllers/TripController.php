<?php

namespace App\Admin\Controllers;

use App\Models\Trip;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TripController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Trip';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Trip());

        $grid->column('user_id', __('User id'));
        $grid->column('bus_id', __('Bus Number'));
        $grid->column('seat_number', __('Seat number'));

        $grid->filter(function($filter){

            $filter->disableIdFilter();
            // $filter->like('user.name', 'Pet Owner');
            $filter->like('user.name', 'User id');
            // $filter->like('name','Pet Name');
        
        });

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
        $show = new Show(Trip::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('user_id', __('User id'));
        $show->field('bus_id', __('Bus id'));
        $show->field('seat_number', __('Seat number'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Trip());

        $form->select('user_id', __('User'))->options(User::all()->pluck('name', 'id'))->rules('required');;
        $form->number('bus_id', __('Bus Number'))->required();
        $form->text('seat_number', __('Seat number'))->required();

        return $form;
    }
}
