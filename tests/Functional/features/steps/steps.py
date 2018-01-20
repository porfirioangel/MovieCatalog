import time
from behave import *
from selenium.common.exceptions import NoSuchElementException
from selenium.webdriver.common.by import By
from selenium.webdriver.common import keys

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


################################################################################
# Helpers
################################################################################

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
