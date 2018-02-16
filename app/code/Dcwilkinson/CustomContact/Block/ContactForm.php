<?php
namespace Dcwilkinson\CustomContact\Block;

use Magento\Framework\View\Element\Template;

class ContactForm extends \Magento\Contact\Block\ContactForm
{
  public function helloContactForm() { 
    return "helloContactForm says hi!"; 
  }
  public function helloContactFormTwo() { 
    return "helloContactFormTwo says hi!"; 
  }
}