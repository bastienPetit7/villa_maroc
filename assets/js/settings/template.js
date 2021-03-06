export default `<div class="settings js-settings">
  <div class="settings-toggle">
    <div class="settings-toggle-option settings-toggle-option-text js-settings-toggle" title="Theme Builder">
      <i class="align-middle" data-feather="sliders"></i>
      Builder
    </div>
    <a class="settings-toggle-option" title="Documentation" href="docs-introduction.html" target="_blank">
      <i class="align-middle" data-feather="book-open"></i>
    </a>
  </div>

  <div class="settings-panel">
    <div class="settings-content">
      <div class="settings-title d-flex align-items-center">
        <button type="button" class="btn-close float-right js-settings-toggle" aria-label="Close"></button>

        <h4 class="mb-0 ms-2 d-inline-block">Theme Builder</h4>
      </div>

      <div class="settings-body">

      <div class="alert alert-primary" role="alert">
        <div class="alert-message">
          <strong>Hey there!</strong> Set your own customized style below. Choose the ones that best fits your needs.
        </div>
      </div>

        <div class="mb-3">
          <span class="d-block font-size-lg font-weight-bold">Color scheme</span>
          <span class="d-block text-muted mb-2">The perfect color mode for your app.</span>

          <div class="row g-0 text-center mx-n1 mb-2">
            <div class="col">
              <label class="mx-1 d-block mb-1">
                <input class="settings-scheme-label" type="radio" name="theme" value="default">
                <div class="settings-scheme">
                  <div class="settings-scheme-theme settings-scheme-theme-default"></div>
                </div>
              </label>
              Default
            </div>
            <div class="col">
              <label class="mx-1 d-block mb-1">
                <input class="settings-scheme-label" type="radio" name="theme" value="colored">
                <div class="settings-scheme">
                  <div class="settings-scheme-theme settings-scheme-theme-colored"></div>
                </div>
              </label>
              Colored
            </div>
          </div>
          <div class="row g-0 text-center mx-n1">
            <div class="col">
              <label class="mx-1 d-block mb-1">
                <input class="settings-scheme-label" type="radio" name="theme" value="dark">
                <div class="settings-scheme">
                  <div class="settings-scheme-theme settings-scheme-theme-dark"></div>
                </div>
              </label>
              Dark
            </div>
            <div class="col">
              <label class="mx-1 d-block mb-1">
                <input class="settings-scheme-label" type="radio" name="theme" value="light">
                <div class="settings-scheme">
                  <div class="settings-scheme-theme settings-scheme-theme-light"></div>
                </div>
              </label>
              Light
            </div>
          </div>
        </div>
        
        <hr />

        <div class="mb-3">
          <span class="d-block font-size-lg font-weight-bold">Sidebar position</span>
          <span class="d-block text-muted mb-2">Toggle the position of the sidebar.</span>

          <div>
            <label>
              <input class="settings-button-label" type="radio" name="sidebarPosition" value="left">
              <div class="settings-button">
                Left
              </div>
            </label>
            <label>
              <input class="settings-button-label" type="radio" name="sidebarPosition" value="right">
              <div class="settings-button">
                Right
              </div>
            </label>
          </div>
        </div>

        <hr />

        <div class="mb-3">
          <span class="d-block font-size-lg font-weight-bold">Sidebar behavior</span>
          <span class="d-block text-muted mb-2">Change the behavior of the sidebar.</span>

          <div>
            <label>
              <input class="settings-button-label" type="radio" name="sidebarBehavior" value="sticky">
              <div class="settings-button">
                Sticky
              </div>
            </label>
            <label>
              <input class="settings-button-label" type="radio" name="sidebarBehavior" value="fixed">
              <div class="settings-button">
                Fixed
              </div>
            </label>
            <label>
              <input class="settings-button-label" type="radio" name="sidebarBehavior" value="compact">
              <div class="settings-button">
                Compact
              </div>
            </label>
          </div>
        </div>

        <hr />

        <div class="mb-3">
          <span class="d-block font-size-lg font-weight-bold">Layout</span>
          <span class="d-block text-muted mb-2">Toggle container layout system.</span>

          <div>
            <label>
              <input class="settings-button-label" type="radio" name="layout" value="fluid">
              <div class="settings-button">
                Fluid
              </div>
            </label>
            <label>
              <input class="settings-button-label" type="radio" name="layout" value="boxed">
              <div class="settings-button">
                Boxed
              </div>
            </label>
          </div>
        </div>

      </div>

      <div class="settings-footer">
        <div class="d-grid">
          <a class="btn btn-primary btn-lg btn-block" href="https://themes.getbootstrap.com/product/appstack-responsive-admin-template/" target="_blank">Purchase</a>
        </div>
      </div>

    </div>
  </div>
</div>`