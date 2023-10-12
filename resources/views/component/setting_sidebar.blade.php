<div class="card shadow-sm ">
    <div class="card-body">
        <ul class="list-group list-group-flush">
          <a href="javascript:void(0);" data-toggle="sidebar-colapse" class="bg-light list-group-item list-group-item-action sidebar-separator-title text-muted d-flex d-md-none align-items-center">
            <div class="d-flex w-100 justify-content-start align-items-center">
              <small id="collapse-text" class="menu-collapsed">MENU</small>
              <span id="collapse-icon" class="fa fa-fw fa-small-collapse ml-auto fa-angle-double-left"></span>
            </div>
          </a>
          <a href="{{ route('settings') }}" class="list-group-item list-group-item-action flex-column align-items-start bg-transparent mb-2 py-2 border-bottom-0 ">
            <div class="d-flex justify-content-start align-items-center">
              <span class="fa fa-cog fa-fw mr-3"></span>
              <span class="menu-collapsed">General Settings</span>
            </div>
          </a>

          <!-- <a href="./masterdata.html" class="list-group-item list-group-item-action flex-column align-items-start bg-transparent mb-2 py-2 border-bottom-0 ">
            <div class="d-flex justify-content-start align-items-center">
              <span class="fa fa-database fa-fw mr-3"></span>
              <span class="menu-collapsed">Master Data</span>
            </div>
          </a> -->
          <a href="{{ route('companies') }}" class="list-group-item list-group-item-action flex-column align-items-start bg-transparent mb-2 py-2 border-bottom-0 ">
            <div class="d-flex justify-content-start align-items-center">
              <span class="fa fa-building fa-fw mr-3"></span>
              <span class="menu-collapsed">Data Companies</span>
            </div>
          </a>
          <a href="{{ route('users') }}" class="list-group-item list-group-item-action flex-column align-items-start bg-transparent mb-2 py-2 border-bottom-0 ">
            <div class="d-flex justify-content-start align-items-center">
              <span class="fa fa-users fa-fw mr-3"></span>
              <span class="menu-collapsed">Data Customers</span>
            </div>
          </a>
          <!-- <a href="{{ route('hakakses.index') }}" class="list-group-item list-group-item-action flex-column align-items-start bg-transparent mb-2 py-2 border-bottom-0" >
            <div class="d-flex justify-content-start align-items-center">
              <span class="fa fa-universal-access fa-fw mr-3"></span>
              <span class="menu-collapsed">Access Rights</span>
            </div>
          </a> -->

        </ul>
    </div>
</div>