<footer>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="logo"><img src="images\i\logo.png"></div>
				<div class="right-column"><span class="phone">8-951-895-69-46</span></div>
				<div class="left-column"><span class="phone">8-951-895-69-46</span></div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="rekvizit"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<a id="konf-politik" data-toggle="modal" data-target="#modal-politik">Политика конфиденциальности</a>
			</div>
		</div>
	</div>
</footer>

<!-- Modal -->
 <div class="modal fade" id="modal-form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3>Modal title</h3>
            </div>
            <div class="modal-body">    
                <form id="" method="POST" action="test_send.php" class="form-order">
                    <div class="form-result animated zoomIn">
                        <p class="lead">Ваша заявка успешно принята!</p>
                        <p>Наш оператор перезвонит вам в ближайшее время. Спасибо.</p>
                        <a href="#" class="btn btn-gold btn-lg" data-dismiss="modal"> Ок! </a>
                    </div>
                    <div class="form-body animated zoomIn">
                        <div class="oneClickInput oneClickBuyName">
                            <label for="callback_name"  class="default">Ваше имя:</label>
                            <span class='tip'>Некорректно указано имя</span>
                            <input class="callback_name" placeholder="Ваше имя" name="callback_name" type="text">
                        </div>
                        <div class="oneClickInput oneClickBuyPhone">
                            <label for="callback_phone"  class="default">Мобильный телефон:</label>
                            <span class='tip'>Некорректно указан номер</span>
                            <input class="callback_phone" placeholder="Мобильный телефон" name="callback_phone" type="text">
                        </div>
                        <div class="oneClickInput">
                            <input class="callback_product" value="" name="callback_product" type="hidden">
                        </div>
                        <div class="oneClickInput">
                            <input type="submit" class="btn btn-danger btn-large btn-submit" value="Отправить заявку">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Modal -->
<!-- Modal polit -->
<div class="modal fade" id="modal-politik" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3>Политика конфиденциальности</h3>
            </div>
            <div class="modal-body">
                <div class="modalFormContent">
                    <strong>Сайт уважает ваше право и соблюдает конфиденциальность при заполнении, передачи и хранении ваших
                        конфиденциальных сведений.</strong>
                    <strong>Размещение заявки на сайте означает Ваше согласие на обработку данных.</strong>

                    <p>
                        Под персональными данными подразумевается информация, относящаяся к субъекту персональных данных, в
                        частности фамилия, имя и отчество, дата рождения, адрес, контактные реквизиты (телефон, адрес
                        электронной почты), семейное, имущественное положение и иные данные, относимые Федеральным законом
                        от 27 июля 2006 года № 152-ФЗ «О персональных данных» (далее – «Закон») к категории персональных
                        данных.
                        <br><br>
                        Целью обработки персональных данных является оказание сайтом услуг.
                        <br><br>
                        В случае отзыва согласия на обработку своих персональных данных мы обязуемся удалить Ваши
                        персональные данные в срок не позднее 3 рабочих дней. Отзыв согласия можно отправить в электронном
                        виде на наш электронный адресс.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Modal polit -->
