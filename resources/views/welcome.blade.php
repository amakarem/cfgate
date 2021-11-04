@extends('layouts.app')

@section('content')
<?php
if (strlen($body) == 0 && strlen($excerpt) > 5 && strpos($excerpt, '<#required>') === false) {
    echo $excerpt;
} else {
    if (strpos($excerpt, '<#required>') !== false) {
       echo str_ireplace('<#required>','',$excerpt);
    }
?>
<div class="wrapper bgded overlay" style="background-image:url('images/backgrounds/01.jpg');">
  <div id="breadcrumb" class="hoc clear">
  </div>
</div>

<div class="wrapper row3">

  <main class="hoc container clear"> 

    <div class="content"> 

      <h1>{{ $title }}</h1>

        <?php echo $body ?>

    </div>


    <div class="clear"></div>

  </main>

</div>

<?php
}
?>
@endsection