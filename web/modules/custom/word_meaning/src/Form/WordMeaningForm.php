<?php

namespace Drupal\word_meaning\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\word_meaning\FormHandler\WordMeaningFormHandler;

class WordMeaningForm extends FormBase
{
  public function getFormId()
  {
    return 'word_meaning_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['word'] = [
      '#type' => 'textfield',
      '#placeholder' => $this->t('What word are you looking for ?')
    ];

    $form['submit'] = [
      '#type' => 'button',
      '#value' => $this->t('Search'),
    ];

    $form['#theme'] = 'search-definitions';

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    // TODO: Implement submitForm() method.
  }
}
