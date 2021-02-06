<div class="container">
	<div class="home">
		 {loop="$listContacts"}
		 	<div class="contato">
		 		<div class="info">
			 		<span class="nome">
			 			<strong>
			 				{$value.nameContact}
			 			</strong>
			 		</span>
			 		<span>
			 			<strong>E-mail</strong>
				 		{$value.emailContact}
			 		</span>
			 		<span>
			 			<strong>Endereço</strong>
				 		{$value.addressContact}
			 		</span>
			 		<span>
			 			<strong>Telefone:</strong>
				 		{loop="$value.phones"}
				 			<p>
				 				{$value.numberPhone}
				 			</p>
				 		{/loop}
			 		</span>
		 		</div>
		 		<div class="botoes">
			 		<a class="botao verde" href="edit?id={$value.idContact}">
			 			Editar
				 	</a>
				 	<a class="botao remover" onclick="deletar(this, {$value.idContact})">
			 			Excluir
				 	</a>
		 		</div>
		 	</div>
		 {/loop}
		 <div class="pagination">
		 	{if="$prevPage"}
		 		<a href="?page={$prevPage}&limit={$limit}">Anterior</a>
		 	{/if}
		 	{if="$nextPage"}
		 		<a href="?page={$nextPage}&limit={$limit}">Próxima</a>
		 	{/if}
		 </div>
	</div>
</div>