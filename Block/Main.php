<?php
namespace Vaaralav\HelloWorld\Block;
class Main extends \Magento\Framework\View\Element\Template
{

  protected $formKey;
  protected $_isScopePrivate;
  protected $jsLayout;
  protected $configProvider;
  protected $layoutProcessors;

  public function __construct(
      \Magento\Framework\View\Element\Template\Context $context,
      \Magento\Framework\Data\Form\FormKey $formKey,
      \Magento\Checkout\Model\CompositeConfigProvider $configProvider,
      array $layoutProcessors = [],
      array $data = []
  ) {
      parent::__construct($context, $data);
      $this->formKey = $formKey;
      $this->_isScopePrivate = true;
      $this->jsLayout = isset($data['jsLayout']) && is_array($data['jsLayout']) ? $data['jsLayout'] : [];
      $this->configProvider = $configProvider;
      $this->layoutProcessors = $layoutProcessors;
  }

  public function getJsLayout()
    {
        foreach ($this->layoutProcessors as $processor) {
            $this->jsLayout = $processor->process($this->jsLayout);
        }
        return \Zend_Json::encode($this->jsLayout);
    }
}
