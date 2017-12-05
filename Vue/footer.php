<aside>
<h1 id="faq">FAQ</h1>
<dl>
	<dt>Question 1</dt>
		<dd>
			<dl>
				<dt>réponse 1 partie 1</dt>
				<dd>détail 1</dd>
				<dt>réponse 1 partie 2</dt>
				<dd>détail 2</dd>
			</dl>
		</dd>
	<dt>Question 2</dt>
	<dd>
		<dl>
			<dt>réponse 1 partie 1</dt>
			<dd>détail 1</dd>
			<dt>réponse 1 partie 2</dt>
			<dd>détail 2</dd>
		</dl>
	</dd>
	<dt>Question 3</dt>
	<dd>
		<dl>
			<dt>réponse 1 partie 1</dt>
			<dd>détail 1</dd>
			<dt>réponse 1 partie 2</dt>
			<dd>détail 2</dd>
		</dl>
	</dd>
	<dt>Question 4</dt>
	<dd>
		<dl>
			<dt>réponse 1 partie 1</dt>
			<dd>détail 1</dd>
			<dt>réponse 1 partie 2</dt>
			<dd>détail 2</dd>
		</dl>
	</dd>
	<dt>Question 5</dt>
	<dd>
		<dl>
			<dt>réponse 1 partie 1</dt>
			<dd>détail 1</dd>
			<dt>réponse 1 partie 2</dt>
			<dd>détail 2</dd>
		</dl>
	</dd>
	<dt>Question 6</dt>
	<dd>
		<dl>
			<dt>réponse 1 partie 1</dt>
			<dd>détail 1</dd>
			<dt>réponse 1 partie 2</dt>
			<dd>détail 2</dd>
		</dl>
	</dd>
	<dt>Question 7</dt>
	<dd>
		<dl>
			<dt>réponse 1 partie 1</dt>
			<dd>détail 1</dd>
			<dt>réponse 1 partie 2</dt>
			<dd>détail 2</dd>
		</dl>
	</dd>
	<dt>Question 8</dt>
	<dd>
		<dl>
			<dt>réponse 1 partie 1</dt>
			<dd>détail 1</dd>
			<dt>réponse 1 partie 2</dt>
			<dd>détail 2</dd>
		</dl>
	</dd>
	<dt>Question 9</dt>
	<dd>
		<dl>
			<dt>réponse 1 partie 1</dt>
			<dd>détail 1</dd>
			<dt>réponse 1 partie 2</dt>
			<dd>détail 2</dd>
		</dl>
	</dd>
	<dt>Question 10</dt>
	<dd>
		<dl>
			<dt>réponse 1 partie 1</dt>
			<dd>détail 1</dd>
			<dt>réponse 1 partie 2</dt>
			<dd>détail 2</dd>
		</dl>
	</dd>
</dl>
</aside>
</section>
</main>
<footer>
	<address>Auteur: Anthony Cargnino</address>
	<script>
        $('#hideAside').on('click', function() {
			$('aside:first').hide(2000)
        });
		$('#fadeImg').on('click', function() {
			setTimeout(function(){ $('img').fadeOut('slow') }, 2500)
		});
		$('#toggleMenu').on('click', function() {
			setTimeout(function(){ $('.navbar').slideToggle('slow') }, 500)
		});
		$( "dd" ).click(function(e) {
			e.stopPropagation();
			alert($(this).text())
		});
    </script>
</footer>
</main>
</body>
</html>

