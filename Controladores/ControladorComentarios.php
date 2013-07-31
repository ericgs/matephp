<?php
require_once '../DAO/comentarios.php';

function getComentariosDeTareaController($idTarea)
{
	return getComentariosDeTareaDAO($idTarea);
}

function createComentariosDeHisotriaController($idTarea, $comentario, $idUsuario)
{
	return createComentarioDeTareaDAO($idTarea, $comentario, $idUsuario);
}

function updateComentarioDeTareaController($idUsuario, $comentario)
{
	return updateComentarioDeTareaDAO($idUsuario, $comentario);
}

function deleteComentarioDeTareaController($idComentario)
{
	return deleteComentarioDeTareaDAO($idComentario);
}

function getComentariosDeHistoriaController($idHistoria)
{
	return getComentariosDeHistoriaDAO($idHistoria);
}

function createComentariosDeHisotriaController($idHistoria, $comentario, $idUsuario)
{
	return createComentarioDeHistoriaDAO($idHistoria, $comentario, $idUsuario);
}

function updateComentarioDeHistoriaController($idUsuario, $comentario)
{
	return updateComentarioDeHistoriaDAO($idUsuario, $comentario);
}

function deleteComentarioDeHistoriaController($idComentario)
{
	return deleteComentarioDeHistoriaDAO($idComentario);
}