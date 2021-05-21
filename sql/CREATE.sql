USE [ZZ_DELETE_FidelissaCRM]
GO

/****** Object:  Table [dbo].[tbl_Proyectame_TQ]    Script Date: 20/04/2021 5:30:46 p. m. ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[tbl_Proyectame_TQ](
	[id_Proyectame_TQ] [int] IDENTITY(1,1) NOT NULL,
	[st_Nombre] [nvarchar](250) NULL,
	[st_CodigoPaciente] [nvarchar](50) NULL,
	[dt_FechaConsulta] [date] NULL,
	[i_Edad] [int] NULL,
	[i_Peso] [int] NULL,
	[i_Talla] [int] NULL,
	[dt_FechaDiagnostico] [date] NULL,
	[st_TipoTratamiento] [nvarchar](50) NULL,
	[dt_FechaRegistro] [datetime] NULL
) ON [PRIMARY]

GO

ALTER TABLE [dbo].[tbl_Proyectame_TQ] ADD  CONSTRAINT [DF_tbl_Proyectame_TQ_dt_FechaRegistro]  DEFAULT (getdate()) FOR [dt_FechaRegistro]
GO


