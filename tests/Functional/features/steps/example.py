import time
from behave import *
from selenium.common.exceptions import NoSuchElementException
from selenium.webdriver.common.by import By

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


def find_element(context, by, value):
    try:
        context.driver.find_element(by, value)
    except NoSuchElementException as e:
        assert False, 'NoSuchElementException -> By %s (%s)' % (by, value)
