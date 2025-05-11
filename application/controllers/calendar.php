<?php

class Calendar extends Admin_controller
{
    function __construct()
    {
        parent::__construct();

    }

    // show calendar
    public function index()
    {
        $this->data['meta_title'] = 'Calendar';
        $this->data['active']     = 'data-target="calendarMenu"';
        $this->data['subMenu']    = 'data-target="showCalendar"';

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/calendar/calendar', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    // show all event
    public function event_list()
    {
        $this->data['meta_title'] = 'Calendar';
        $this->data['active']     = 'data-target="calendarMenu"';
        $this->data['subMenu']    = 'data-target="eventList"';

        $where = ['trash' => 0];
        if (isset($_POST['show'])) {

            if (!empty($_POST['dateFrom'])) {
                $where['start_date >='] = $_POST['dateFrom'];
            }
            if (!empty($_POST['dateTo'])) {
                $where['start_date <='] = $_POST['dateTo'];
            }
        } else {
            $where['start_date'] = date('Y-m-d');
        }

        $this->data['results'] = get_result('events', $where);

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/calendar/index', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    // store data
    public function store()
    {
        if (isset($_POST['save'])) {

            $data = [
                'title'       => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'url'         => $this->input->post('url'),
                'start_date'  => $this->input->post('start_date'),
                'end_date'    => (!empty($_POST['end_date']) ? $_POST['end_date'] : date('Y-m-d')),
                'start_time'  => (!empty($_POST['start_time']) ? date('H:i:s', strtotime($_POST['start_time'])) : null),
                'end_time'    => (!empty($_POST['end_time']) ? date('H:i:s', strtotime($_POST['end_time'])) : null),
            ];

            save_data('events', $data);

            $msg = [
                'title' => 'success',
                'emit'  => 'Event successfully saved.',
                'btn'   => true
            ];

            $this->session->set_flashdata('confirmation', message('success', $msg));
        }

        redirect('calendar', 'refresh');
    }

    // show edit form
    public function edit($id)
    {
        $this->data['meta_title'] = 'Calendar';
        $this->data['active']     = 'data-target="calendarMenu"';
        $this->data['subMenu']    = 'data-target="eventList"';

        if (!empty($id)) {
            $this->data['info'] = get_row('events', ['id' => $id, 'trash' => 0]);
        } else {
            redirect('calendar/event_list', 'refresh');
        }

        $this->load->view($this->data['privilege'] . '/includes/header', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/aside', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/headermenu', $this->data);
        $this->load->view('components/calendar/edit', $this->data);
        $this->load->view($this->data['privilege'] . '/includes/footer');
    }

    // update data
    public function update()
    {
        if (isset($_POST['update'])) {

            $data = [
                'title'       => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'url'         => $this->input->post('url'),
                'start_date'  => $this->input->post('start_date'),
                'end_date'    => (!empty($_POST['end_date']) ? $_POST['end_date'] : date('Y-m-d')),
                'start_time'  => (!empty($_POST['start_time']) ? date('H:i:s', strtotime($_POST['start_time'])) : null),
                'end_time'    => (!empty($_POST['end_time']) ? date('H:i:s', strtotime($_POST['end_time'])) : null),
            ];

            save_data('events', $data, ['id' => $_POST['id']]);

            $msg = [
                'title' => 'success',
                'emit'  => 'Event successfully saved.',
                'btn'   => true
            ];

            $this->session->set_flashdata('confirmation', message('success', $msg));
        }

        redirect('calendar/event_list', 'refresh');
    }

    // delete data
    public function delete($id = null)
    {
        if (!empty($id)) {

            save_data('events', ['trash' => 1], ['id' => $id]);

            $msg = [
                'title' => 'delete',
                'emit'  => 'Event successfully deleted.',
                'btn'   => true
            ];

            $this->session->set_flashdata('confirmation', message('danger', $msg));
        }

        redirect('calendar/event_list', 'refresh');
    }

    public function allEvent()
    {

        $results = get_result('events', ['trash' => 0]);

        $data = [];
        if (!empty($results)) {
            foreach ($results as $row) {

                $startDate = (!empty($row->start_time) ? $row->start_date . ' ' . $row->start_time : $row->start_date);
                $endDate   = (!empty($row->end_time) ? $row->end_date . ' ' . $row->end_time : $row->end_date);

                $data[] = [
                    'id'          => $row->id,
                    'title'       => $row->title,
                    'description' => $row->description,
                    'start'       => $startDate,
                    'end'         => $endDate,
                ];
            }
        }

        echo json_encode($data);
    }
}
