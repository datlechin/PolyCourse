export function dateFormat(time, locale = 'vi-VN') {
    const date = new Date(time)

    return new Intl.DateTimeFormat(locale).format(date)
}
