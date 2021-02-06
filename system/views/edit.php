<div class="container">
	<div class="edit">
		 <form class="form_ajax" action="edit">
		 	<div class="linha">
			 	<label>
			 		Nome:
			 		<input type="text" value="{$contact.nameContact}" name="nameContact">
			 	</label>
			</div>
		 	<div class="linha">
			 	<label>
			 		E-mail:
			 		<input type="text" value="{$contact.emailContact}" name="emailContact">
			 	</label>
			</div>
		 	<div class="linha">
			 	<label>
			 		Endereço:
			 		<input type="text" value="{$contact.addressContact}" name="addressContact">
			 	</label>
			</div>
	 		<div class="lista">
	 			{loop="$contact.phones"}
				 	<div class="linha telefone">
					 	<label>
					 		Telefone:
					 		<input type="tel" value="{$value.numberPhone}" name="phone[]">
				 		</label>
				 		<span class="botao remover menor">Excluir</span>
			 		</div>
	 			{/loop}
	 		</div>
		 	<p class="botao adicionar addPhone">Novo telefone</p>
		 	<div class="linha center">
		 		<button type="submit" class="primario">Salvar Contato</button>
		 		<input type="hidden" name="idContact" value="{$contact.idContact}"/>
		 	</div>
		 </form>
	</div>
</div>