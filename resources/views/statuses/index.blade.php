<x-layout>
  <div class="container-fluid">
    <br>
      <div class="row">
      <new-sidebar-component></new-sidebar-component>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <statuses-component
              :name="invoice"
          ></statuses-component>
      </main>
    </div>
  </div>
</x-layout>
