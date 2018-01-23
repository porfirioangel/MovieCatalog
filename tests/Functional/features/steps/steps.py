# -*- coding: utf-8 -*-

import json
import time
from behave import *
from selenium.common.exceptions import NoSuchElementException
from selenium.webdriver.common.by import By
from selenium.webdriver.common import keys
import requests

use_step_matcher("re")


@given(u'quiero probar el behave')
def step_impl(context):
    doc = find_element(context.driver, By.TAG_NAME, 'html')


@when(u'ejecuto la prueba')
def step_impl(context):
    pass


@then(u'la prueba pasa correctamente')
def step_impl(context):
    pass


@given(u'I open the login page')
def step_impl(context):
    html = find_element(context.driver, By.TAG_NAME, 'html')
    drop = find_element(context.driver, By.ID, 'userDropdown')
    drop.send_keys(keys.Keys.ENTER)
    btn_login = find_element(context.driver, By.ID, 'btnLogin')
    btn_login.send_keys(keys.Keys.ENTER)
    time.sleep(1)


@given(u'I fill (?P<email>.+) in <email>')
def step_impl(context, email):
    txt_email = find_element(context.driver, By.ID, 'txtEmail')
    txt_email.send_keys(email)


@given(u'I fill (?P<password>.+) in <password>')
def step_impl(context, password):
    txt_password = find_element(context.driver, By.ID, 'txtPassword')
    txt_password.send_keys(password)


@when(u'I click <login>')
def step_impl(context):
    i_click_login(context)


@then(u'I can see the logout menu')
def step_impl(context):
    drop = find_element(context.driver, By.ID, 'userDropdown')
    drop.send_keys(keys.Keys.ENTER)
    btn_logout = find_element(context.driver, By.ID, 'btnLogout')


@given(u'I click <login>')
def step_impl(context):
    i_click_login(context)


@when(u'I open the profile page')
def step_impl(context):
    drop = find_element(context.driver, By.ID, 'userDropdown')
    drop.send_keys(keys.Keys.ENTER)
    btn_profile = find_element(context.driver, By.ID, 'btnProfile')
    btn_profile.send_keys(keys.Keys.ENTER)


@then(u'I can see my personal information')
def step_impl(context):
    p_name = find_element(context.driver, By.ID, 'pName')
    p_lastname = find_element(context.driver, By.ID, 'pLastname')
    p_email = find_element(context.driver, By.ID, 'pEmail')


@then(u'I can see the list of movies')
def step_impl(context):
    movies_location = find_element(context.driver, By.CSS_SELECTOR,
                                   'li.breadcrumb-item.active')
    innerHtml = movies_location.get_attribute('innerHTML')

    assert 'Movies' in innerHtml, 'Se esperaba encontrar "Movies" en ' + innerHtml

    card = find_element(context.driver, By.CLASS_NAME, 'card')
    table = find_element(card, By.TAG_NAME, 'table')
    thead = find_element(table, By.TAG_NAME, 'thead')

    innerHtml = thead.get_attribute('innerHTML')

    assert 'Title' in innerHtml, 'Se esperaba encontrar "Title" en ' + innerHtml
    assert 'Genre' in innerHtml, 'Se esperaba encontrar "Genre" en ' + innerHtml
    assert 'Year' in innerHtml, 'Se esperaba encontrar "Year" en ' + innerHtml
    assert 'Actions' in innerHtml, 'Se esperaba encontrar "Actions" en ' + innerHtml


@given(u'I click <add new movie>')
def step_impl(context):
    btn_add_movie = find_element(context.driver, By.ID, 'btnAddMovie')
    btn_add_movie.send_keys(keys.Keys.ENTER)
    time.sleep(1)


@given(u'I fill (?P<movie_name>.+) in <movie name>')
def step_impl(context, movie_name):
    txt_movie_name = find_element(context.driver, By.ID, 'txtMovieName')
    txt_movie_name.send_keys(movie_name)


@given(u'I fill (?P<movie_genre>.+) in <movie genre>')
def step_impl(context, movie_genre):
    txt_movie_genre = find_element(context.driver, By.ID, 'txtMovieGenre')
    txt_movie_genre.send_keys(movie_genre)


@given(u'I fill (?P<movie_year>.+) in <year>')
def step_impl(context, movie_year):
    txt_movie_year = find_element(context.driver, By.ID, 'txtMovieYear')
    txt_movie_year.send_keys(movie_year)


@when(u'I click <save movie>')
def step_impl(context):
    btn_save_movie = find_element(context.driver, By.ID, 'btnSaveMovie')
    btn_save_movie.send_keys(keys.Keys.ENTER)
    time.sleep(1)


@when(u'I click <delete> for the first movie in the list')
def step_impl(context):
    context.old_movies_count = get_movie_count()
    btn_delete_movie = find_element(context.driver, By.CLASS_NAME,
                                    'btnDeleteMovie')
    btn_delete_movie.send_keys(keys.Keys.ENTER)
    time.sleep(1)


@when(u'I click <accept> in the delete confirmation')
def step_impl(context):
    btn_confirm_delete = find_element(context.driver, By.ID,
                                    'btnConfirmDeleteMovie')
    btn_confirm_delete.send_keys(keys.Keys.ENTER)
    time.sleep(1)


@then(u'the movie that I deleted dissapear from the list')
def step_impl(context):
    new_movie_count = get_movie_count()
    assert context.old_movies_count - 1 == new_movie_count, \
        'Se esperaban ' + str(context.old_movies_count - 1)  + \
        u' películas y se obtuvieron ' + str(new_movie_count)



################################################################################
# Helpers
################################################################################

def get_movie_count():
    url = 'http://localhost:8000/api/movie_list'
    headers = {'Content-Type': 'application/json'}
    response = requests.get(url, headers)

    if response.status_code == 200:
        movies = json.loads(response.content.decode('utf-8'))
        return len(movies)
    else:
        assert False, 'The status code was ' + str(response.status_code)

def i_click_login(context):
    btn_login = find_element(context.driver, By.ID, 'btnLogin')
    btn_login.send_keys(keys.Keys.ENTER)
    time.sleep(2)


def find_element(root, by, value):
    try:
        element = root.find_element(by, value)
        return element
    except NoSuchElementException as e:
        assert False, 'NoSuchElementException -> By %s (%s)' % (by, value)
