USE [Loja]
GO
/****** Object:  Table [dbo].[tbl_vendas]    Script Date: 04/10/2015 17:13:10 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_vendas](
	[id_venda] [int] NOT NULL,
	[id_loja] [int] NOT NULL,
	[cnpj] [nchar](20) NOT NULL,
	[id_setor_comercial] [int] NOT NULL,
	[desc_setor_comercial] [decimal](10, 2) NOT NULL,
	[id_setor_campo] [int] NOT NULL,
	[desc_setor_campo] [nchar](100) NOT NULL,
	[id_bandeira] [int] NOT NULL,
	[desc_bandeira] [nchar](10) NULL,
	[id_estado] [int] NOT NULL,
	[desc_estado] [nchar](100) NOT NULL,
	[ativo] [tinyint] NULL,
	[endereco] [nchar](255) NOT NULL,
	[cidade] [nchar](60) NOT NULL,
	[bairro] [nchar](60) NOT NULL,
	[cep] [nchar](10) NOT NULL,
	[nome_loja] [nchar](65) NOT NULL,
	[venda] [decimal](10, 2) NULL,
	[desconto] [decimal](10, 2) NOT NULL,
 CONSTRAINT [PK_tbl_vendas] PRIMARY KEY CLUSTERED 
(
	[id_venda] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
