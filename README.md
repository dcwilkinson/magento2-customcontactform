# Magento 2 Custom Form

Custom form for Magento 2, using a preference to override core. 

I've used a preference here, which for the purposes of what I'm doing here, acts as a local override that we used in Magento 1:

<strong>app/code/Dcwilkinson/CustomForm/etc/di.xml</strong>

    <preference for="Magento\Contact\Block\ContactForm" type="Dcwilkinson\CustomContact\Block\ContactForm" />
    
Magento will now use the class set as "type" when instantiating the core Magento\Contact\Block\ContactForm class. 

I've created the corresponding block class here: <strong>app/code/Dcwilkinson/CustomForm/Block/CustomForm.php</strong>

In this class, I'm not doing anything fancy, but simply extending the class we're "overriding" as follows:
	
	class ContactForm extends \Magento\Contact\Block\ContactForm

I'm also parsing two methods to my new class, which will be accessible in the frontend template via a method call to the block object ($block).

The layout XML follows the same path: <strong>app/code/Dcwilkinson/CustomContact/view/frontend/layout/contact_index_index.xml</strong>. We remove the reference to "contactForm" that the core ContactForm class creates as follows:
	
	<referenceBlock name="contactForm" remove="true"/> 
	
We then create a new block and point it to the frontend template located in our module at <strong>app/code/Dcwilkinson/CustomContact/view/frontend/templates/form.phtml</strong>:
	
	<referenceContainer name="content">
		<block class="Magento\Contact\Block\ContactForm" name="customContactForm" template="Dcwilkinson_CustomContact::form.phtml"/>
	</referenceContainer>
	
For now, the contents of our module's form.phtml are identical to the contents of Magento's form.phtml located in <strong>vendor/magento/module-contact/view/frontend/templates/form.phtml</strong>.

The only difference is I've added in two calls to the block class methods as follows:

	<?php echo $block->helloContactForm(); ?>
	<?php echo $block->helloContactFormTwo(); ?>
	
These are located above and below the fieldsets of the form.
