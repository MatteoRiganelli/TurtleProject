@extends('layouts.app')

<h1> Forgot Password </h1>

<p> We have rec. a request from you to reset your password </p>

<p> Click <a href="{{$url}}/reset-password/{{$token->token}}">here</a> to reset your password.</p>

