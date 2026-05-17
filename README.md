Table users {
  id bigint [pk, increment]
  name varchar
  email varchar [unique]
  password varchar
  role varchar [note: 'admin, cliente, entregador']
  telefone varchar
  created_at timestamp
  updated_at timestamp
  deleted_at timestamp
}

Table categorias {
  id bigint [pk, increment]
  nome varchar
  descricao text [null]
  created_at timestamp
  updated_at timestamp
}

Table produtos {
  id bigint [pk, increment]
  categoria_id bigint [not null]
  nome varchar
  descricao text [null]
  preco_base decimal(10,2)
  imagem_url varchar [null]
  disponivel boolean [default: true]
  created_at timestamp
  updated_at timestamp
  deleted_at timestamp
}

Table pedidos {
  id bigint [pk, increment]
  user_id bigint [not null]
  status varchar [note: 'pendente, em_preparo, saiu_entrega, entregue']
  tipo_pedido varchar [note: 'delivery, retirada, local']
  valor_total decimal(10,2)
  metodo_pagamento varchar
  endereco_entrega text [null]
  created_at timestamp
  updated_at timestamp
}

Table itens_pedido {
  id bigint [pk, increment]
  pedido_id bigint [not null]
  produto_id bigint [not null]
  quantidade int [default: 1]
  preco_unitario decimal(10,2) [note: 'Preço fixado no momento']
  observacao text [null]
}

Table mesas {
  id bigint [pk, increment]
  numero int [unique]
  capacidade int
  status varchar [default: 'disponivel', note: 'disponivel, ocupada, reservada']
}

Table reservas {
  id bigint [pk, increment]
  user_id bigint [not null]
  mesa_id bigint [not null]
  data_reserva timestamp
  quantidade_pessoas int
  status varchar [note: 'agendada, concluida, cancelada, no_show']
  created_at timestamp
  updated_at timestamp
}

Ref: produtos.categoria_id > categorias.id
Ref: pedidos.user_id > users.id
Ref: itens_pedido.pedido_id > pedidos.id
Ref: itens_pedido.produto_id > produtos.id
Ref: reservas.user_id > users.id
Ref: reservas.mesa_id > mesas.id