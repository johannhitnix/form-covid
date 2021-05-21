USE [ZZ_DELETE_FidelissaCRM]
GO

INSERT INTO [dbo].[tbl_Proyectame_TQ]
           ([st_Nombre]
           ,[st_CodigoPaciente]
           ,[dt_FechaConsulta]
           ,[i_Edad]
           ,[i_Peso]
           ,[i_Talla]
           ,[dt_FechaDiagnostico]
           ,[st_TipoTratamiento]
           )
     VALUES
           ('TEST ONE'
           ,'TO-001'
           ,'2021-03-03'
           ,38
           ,88
           ,147
           ,'2021-03-03'
           ,'TEST TEST'
           )
GO


