<?php

class ModalFooterSPYView
{

  public static function modalFooterSPY()
  {
    ?>
    <div class="modal fade" id="modalFooterSpy" tabindex="-1" aria-labelledby="modalSpyDev" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div id='modal-content' class="modal-content">
          <div id="modalHeader" class="modal-header">
            <h5 class="modal-title">S.P.Y. - Everything, Everywhere, Everytime...</h5>
          </div>
          <div id="modalBody" class="modal-body">
            <h3>Who are we ?</h3>
            <p>Click on our names below to see our LikedIn profiles.</p>
            <a id="maj" href="https://www.linkedin.com/in/sergio-nunez-meneses-826584a0/" target="_blank"><span>S</span>ergio NUNEZ MENESES</a><br/><a id="maj" href="https://www.linkedin.com/in/philippe-perechodov/" target="_blank"><span>P</span>hilippe PERECHODOV</a><br/><a id="maj" href="https://www.linkedin.com/in/yacine-sbai/" target="_blank"><span>Y</span>acine SBAÏ</a>
            <hr>
            <h5>- Dashboard Project - <a href="https://www.accesscodeschool.fr" target="_blank">ACS</a> - Septembre 2020</h5>
            <p>Site created in HTML - CSS - PHP - MySQL - Javascript - AJAX</p>
            <a id="github" href="https://github.com/sergio-nunez-meneses/purchase-management-dashboard" target="_blank"><i class="fab fa-github"></i></a>
          </div>
          <div id="modalFooter" class="modal-footer">
            <button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <?php
  }
}
?>
