define(['uiComponent'], function(Component) {
  viewModelConstructor = Component.extend({
    defaults: {
      template: 'Vaaralav_HelloWorld/sparta',
    },
    foo: 'bar',
    /*
    <item name="config" xsi:type="array">
      <item name="foobar" xsi:type="string">Tsaijajaijai</item>
    </item>
     */
    foobar: 'baz', // XML definition wins this JS definition
    initialize: function(config, node) {
      this._super();
      console.log({ config, node });
    },
  });

  return viewModelConstructor;
});
