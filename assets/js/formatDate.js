function formatDate(dataNascimento) {
    const date = new Date(dataNascimento + 'T00:00:00');
    if (Number.isNaN(date.getTime())) {
        return 'Data inválida';
    }
    return new Intl.DateTimeFormat('pt-BR', {
        day: '2-digit',
        month: '2-digit',
    }).format(date);
}