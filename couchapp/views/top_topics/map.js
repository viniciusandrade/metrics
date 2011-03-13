function(doc) {
  if (doc.type == 'topic') {
    emit([doc.date, doc.site, doc.title], 1);
  }
};
