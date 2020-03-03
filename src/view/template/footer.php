<footer id="footer">
  <div class="footer--head">
    <div class="head--skewed-bg--darkpurple"> </div>
    <div class="head--skewed-bg--lightpurple"> </div>
    <div class="head--skewed-bg--green"> </div>
  </div>
  <div class="footer--content">

    <div class="footer--contact">
      <h2>Contact</h2>

      <form method="post" action="index.php?a=contact">

        <div class="contact--form">
          <input type="email" name="mail" id="contact-mail" placeholder="@ <?= Template::contact()["mail"] ?>" required/>
          <input type="text" name="obj" id="contact-obj" placeholder="<?= Template::contact()["obj"] ?>" required/>
          <textarea name="message" id="contact-msg" placeholder="Message&hellip;"></textarea>
        </div>

        <div class="contact--submit">
          <div class="g-recaptcha" data-sitekey="6LfWXyYTAAAAAFwOPGhUPDZRfbIF3UYLT5aizeBE"></div>
          <button type="submit"><span><?= Template::contact()["ok"] ?></span><i class="fas fa-paper-plane"></i></button>
        </div>

      </form>

    </div>

    <div class="footer--partners">
      <ul>
        <?php foreach (Template::partners() as $partner) { ?>
        <li><a href="<?= $partner->get("site") ?>" target="_blank"><img src="<?= $partner->get("image") ?>" alt="<?= $partner->get("nom") ?>"/></a></li>
        <?php } ?>
      </ul>

      <div class="partners--title">
        <h2><?= Template::partners_title() ?></h2>
        <div></div>
        <div></div>
      </div>
    </div>

    <div class="footer--authors">
      <p><a href="mailto:<?= Template::bottom_line()["mail"] ?>"><?= Template::bottom_line()["mail"] ?></a></p>
      <p>
        <a href="index.php?a=showAdmin"><i class="fas fa-lock"></i> <?= Template::bottom_line()["admin"] ?></a>
        <span><?= Template::bottom_line()["dut"] ?> - France</span>
      </p>
      <p><?= Template::bottom_line()["cp"] ?></p>
    </div>

  </div>
</footer>

<div id="go-up">
  <button>
    <span class="fa-stack">
      <i class="fas fa-circle fa-stack-2x"></i>
      <i class="fas fa-arrow-up fa-stack-1x"></i>
    </span>
  </button>
</div>
