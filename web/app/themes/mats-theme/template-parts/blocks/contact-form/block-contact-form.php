<?php

?>

<form id="form" class="contact-form" action="" method="POST">
    <div class="contact-form__left">
        <div class="contact-form__group">
            <label class="contact-form__label" for="name">Imię i nazwisko</label>
            <input class="contact-form__input contact-form__input--text" type="text" name="name" id="name" placeholder="Imię i nazwisko" />
        </div>
        <div class="contact-form__group">
            <label class="contact-form__label" for="email">Adres e-mail</label>
            <input class="contact-form__input contact-form__input--email" type="email" name="email" id="email" placeholder="Adres e-mail" />
        </div>
        <div class="contact-form__group">
            <label class="contact-form__label" for="subject">Temat wiadomości</label>
            <input class="contact-form__input contact-form__input--text" type="text" name="subject" id="subject" placeholder="Temat wiadomości" />
        </div>
    </div>
    <div class="contact-form__right">
        <div class="contact-form__group">
            <label class="contact-form__label" for="message">Treść wiadomości</label>
            <textarea class="contact-form__input contact-form__input--textarea" name="message" id="message" placeholder="Treść wiadomości" rows="7"></textarea>
        </div>
    </div>
    <div class="contact-form__footer">
        <div class="contact-form__confirmation"></div>
        <input class="contact-form__submit" type="submit" value="Wyślij wiadomość" />
    </div>
</form>
