<?php

namespace Drupal\rsvplist\Form;

use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class RSVPForm extends FormBase {

    public function getFormId() {
        return 'rsvplist_email_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state){
        $node = \Drupal::routeMatch()->getParameter('node');
        $nid = $node->nid->value;
        $form['email'] = array(
            '#title' => t('Email Address'),
            '#type' => 'textfield',
            '#size' => 25,
            '#description' => t('We send updates to the email address'),
            '$required' => TRUE,
        );

        $form['submit'] = array(
          '#type' => 'submit',
          '#value' => t('RSVP'),
        );

        $form['nid'] = array(
            '#type' => 'hidden',
            '#value' => $nid,
        );
        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state){
        drupal_set_message(t('The form is working.'));
    }
}


