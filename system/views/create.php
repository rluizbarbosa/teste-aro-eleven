<div class="container">
	<div class="create">
		 <form class="form_ajax" action="create">
		 	<div class="linha">
			 	<label>
			 		Nome:
			 		<input type="text" name="nameContact">
			 	</label>
			</div>
		 	<div class="linha">
			 	<label>
			 		E-mail:
			 		<input type="text" name="emailContact">
			 	</label>
			</div>
		 	<div class="linha">
			 	<label>
			 		Endereço:
			 		<input type="text" name="addressContact">
			 	</label>
			</div>
	 		<div class="lista">
			 	<div class="linha telefone">
				 	<label>
				 		Telefone:
				 		<input type="tel" name="phone[]">
			 		</label>
			 		<span class="botao remover menor">Excluir</span>
		 		</div>
	 			
	 		</div>
		 	<p class="botao adicionar addPhone">Novo telefone</p>
		 	<div class="center">
		 		<button type="submit" class="primario">Salvar Contato</button>
		 	</div>
		 </form>
	</div>
</div>