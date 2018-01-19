import time
from behave import *
from selenium.common.exceptions import NoSuchElementException
from selenium.webdriver.common.by import By
from selenium.webdriver.common import  keys

use_step_matcher("re")


@given(u'quiero probar el behave')
def step_impl(context):
    doc = find_element(context, By.TAG_NAME, 'html')


@when(u'ejecuto la prueba')
def step_impl(context):
    pass


@then(u'la prueba pasa correctamente')
def step_impl(context):
    pass

@given(u'I open the login page')
def step_impl(context):
    drop = find_element(context, By.ID, 'userDropdown')
    drop.send_keys(keys.Keys.ENTER)
    btn_login = find_element(context, By.ID, 'btnLogin')
    btn_login.send_keys(keys.Keys.ENTER)
    time.sleep(1)

@given(u'I fill (?P<email>.+) in <email>')
def step_impl(context, email):
    txt_email = find_element(context, By.ID, 'txtEmail')
    txt_email.send_keys(email)

@given(u'I fill (?P<password>.+) in <password>')
def step_impl(context, password):
    txt_password = find_element(context, By.ID, 'txtPassword')
    txt_password.send_keys(password)

@when(u'I click <login>')
def step_impl(context):
    btn_login = find_element(context, By.ID, 'btnLogin')
    btn_login.send_keys(keys.Keys.ENTER)
    time.sleep(2)

@then(u'I can see the logout menu')
def step_impl(context):
    drop = find_element(context, By.ID, 'userDropdown')
    drop.send_keys(keys.Keys.ENTER)
    btn_logout = find_element(context, By.ID, 'btnLogout')



def find_element(context, by, value):
    try:
        element = context.driver.find_element(by, value)
        return element
    except NoSuchElementException as e:
        assert False, 'NoSuchElementException -> By %s (%s)' % (by, value)
