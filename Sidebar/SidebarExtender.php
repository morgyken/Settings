<?php

/*
 * =============================================================================
 *
 * Collabmed Solutions Ltd
 * Project: Collabmed Health Platform
 * Author: Samuel Okoth <sodhiambo@collabmed.com>
 *
 * =============================================================================
 */

namespace Ignite\Settings\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Ignite\Core\Contracts\Authentication;

/**
 * Description of SidebarExtender
 *
 * @author Samuel Dervis <samueldervis@gmail.com>
 */
class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender {

    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth) {
        $this->auth = $auth;
    }

    public function extendWith(\Maatwebsite\Sidebar\Menu $menu) {
        $menu->group('Dashboard', function (Group $group) {
            $group->item('Setup', function (Item $item) {
                $item->icon('fa fa-cogs');
                $item->weight(80);
                $item->authorize($this->auth->hasAccess('setup.*'));

                $item->item('General Settings', function (Item $item) {
                    $item->icon('fa fa-cogs');
                    $item->route('settings.settings');
                });
                $item->item('Organization', function (Item $item) {
                    $item->icon('fa fa-cog');
                    $item->route('settings.practice');
                });
                $item->item('Facilities', function (Item $item) {
                    $item->icon('fa fa-building');
                    $item->route('settings.clinics');
                });
                /*
                 * @todo Include in modules
                  $item->item('Appointment Categories', function(Item $item) {
                  $item->icon('fa fa-wpforms');
                  $item->route('settings.schedule_cat');
                  });
                  $item->item('Procedure Categories', function(Item $item) {
                  $item->icon('fa fa-wpforms');
                  $item->route('settings.procedure_cat');
                  });
                  $item->item('Procedures', function(Item $item) {
                  $item->icon('fa fa-hourglass-1');
                  $item->route('settings.procedures');
                  }); */
                $item->item('Insurance Companies', function(Item $item) {
                    $item->icon('fa fa-institution');
                    $item->route('settings.companies');
                });
                $item->item('Insurance Schemes', function(Item $item) {
                    $item->icon('fa fa-plus-square');
                    $item->route('settings.schemes');
                });
            });
        });
        return $menu;
    }

}
