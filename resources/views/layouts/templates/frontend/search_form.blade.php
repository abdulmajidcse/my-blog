<form id="search-form" class="mb-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search Blog Posts" aria-label="Search" id="search-value" value="{{ isset($searchValue) ? $searchValue : '' }}">

      <div class="input-group-append">
        <button class="btn btn-navbar bg-primary" type="submit">
          <i class="fas fa-search text-light"></i>
        </button>
      </div>
    </div>
</form>