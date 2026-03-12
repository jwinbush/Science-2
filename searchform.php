<form role="search" method="get" id="searchform"
  action="<?php echo home_url( '/' ); ?>">

  <label for="search" class="sr-only">Search</label>

  <input name="s" id="s" type="text" onFocus="this.value=''; return false;"
    onBlur="this.value=!this.value?'Search':this.value;" value=""
    placeholder="What are you looking for?" class="search__input" />

  <svg tabindex="0" width="24" height="24" class="search__btn-submit"
    onclick="document.getElementById('searchform').submit()">
    <use
      href="<?php bloginfo('template_directory'); ?>/images/icons.svg#search" />
  </svg>

</form>